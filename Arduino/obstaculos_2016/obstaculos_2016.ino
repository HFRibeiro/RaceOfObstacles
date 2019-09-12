#include <SPI.h>
#include <Ethernet.h>
#include <LiquidCrystal.h>
#include <WebSocket.h>


// NETWORK
#define MAX_FRAME_LENGTH 64
byte mac[] = { 0x52, 0x4F, 0x43, 0x4B, 0x45, 0x54 };
byte ip[] = { 172, 16, 1 , 70 };



//PINOS HARDWARE
#define pino_det_1 A0
#define pino_det_2 A1
#define pino_botao A2
#define pino_LCD_RS 3
#define pino_LCD_E 8
#define pino_LCD_D4 7
#define pino_LCD_D5 5
#define pino_LCD_D6 6
#define pino_LCD_D7 2
#define pino_LED_DET_1 A3
#define pino_LED_DET_2 A6
#define pino_LED_STATUS A4
#define pino_LED_STATUS2 A5

//FASES DA CORRIDA
#define SETUP 1
#define END 2
#define RACE 3

//TRAMAS
# define TRAMA_DET_1 1
# define TRAMA_DET_2 2 
# define TRAMA_RESET 4

// VALORES
# define DETETOR_THRESHOLD 800
# define STATUS_TEMPO 100
byte passo = SETUP;
bool print_enable = true;

LiquidCrystal lcd(pino_LCD_RS, pino_LCD_E, pino_LCD_D4, pino_LCD_D5, pino_LCD_D6, pino_LCD_D7);

WebSocketServer wsServer;

int socketLimiteTime = 100;
unsigned long socketTimeStamp = 0;

void onConnect(WebSocket &socket) {
	Serial.println("onConnect called");
}

void onData(WebSocket &socket, char* dataString, byte frameLength) {

	char inChar = dataString[0];
	if (inChar == 'S')
		passo = SETUP;
	if (print_enable)
	{
		lcd.begin(16, 2);
		lcd.print("INTERFACE MODE");
		print_enable = false;
	}
	Serial.println(inChar);
}

void onDisconnect(WebSocket &socket) {
	Serial.println("onDisconnect called");
}


void setup()
{
	Serial.begin(57600);

	Ethernet.begin(mac, ip);

	wsServer.registerConnectCallback(&onConnect);
	wsServer.registerDataCallback(&onData);
	wsServer.registerDisconnectCallback(&onDisconnect);
	wsServer.begin();
	delay(100);
	pinMode(pino_botao, INPUT);
	pinMode(pino_det_1, INPUT);
	pinMode(pino_det_2, INPUT);
	pinMode(pino_LCD_RS, OUTPUT);
	pinMode(pino_LCD_E, OUTPUT);
	pinMode(pino_LCD_D5, OUTPUT);
	pinMode(pino_LCD_D5, OUTPUT);
	pinMode(pino_LCD_D6, OUTPUT);
	pinMode(pino_LCD_D7, OUTPUT);
	pinMode(pino_LED_DET_1, OUTPUT);
	pinMode(pino_LED_DET_2, OUTPUT);
	pinMode(pino_LED_STATUS, OUTPUT);
	pinMode(pino_LED_STATUS2, OUTPUT);

	Serial.print("R");
	passo = SETUP;
	
	lcd.begin(16, 2);
	lcd.print("SETUP");
}


byte old_passo = SETUP;
bool escreve_relogio = true;
unsigned long int tempo_start = 0;


long int tempo = 0;
unsigned long min = 0;
unsigned long seg = 0;
unsigned long cent = 0;

void envia(String red)
{
	char dataString[5];
	red.toCharArray(dataString, 5);
	Serial.print("Send: ");
	Serial.println(dataString);
	wsServer.send(dataString, strlen(dataString));
}

void loop()
{	
	if (millis() - socketTimeStamp>socketLimiteTime)
	{
		wsServer.listen();
		socketTimeStamp = millis();
	}

	bool det1 = detetor(1);
	bool det2 = detetor(2);
	
	switch (passo)
	{
	case SETUP:
		if (det1)
		{
			envia("1");
			passo = RACE;
			tempo_start = millis();
		}

		break;
	case RACE:
		if (det2)
		{
			envia("2");
			passo = END;
		}
		if (print_enable)
		{
			lcd.setCursor(0, 0);
			lcd.print("RACE    ");
			tempo = millis()-tempo_start;
			lcd.setCursor(0, 1);
			min = tempo / 60000;
			lcd.print(min);
			lcd.print(":");
			seg = (tempo - 60000 * min) / 1000;
			if (seg<10)
				lcd.print("0");
			lcd.print(seg);
			lcd.print(":");
			cent = (tempo - 60000 * min - 1000 * seg) / 10;
			if (cent<10)
				lcd.print("0");
			lcd.print(cent);
		}
		break;
	case END:
		if (print_enable)
		{
			lcd.setCursor(0, 0);
			lcd.print("END     ");
		}
		break;
	}

	status();
	if (recieve() == 'R')
		passo = SETUP;

	if (reset())
		passo = SETUP;
}
bool old_botao = false;
unsigned long int tempo_1 = 0;


bool reset()
{
	int act_botao = digitalRead(pino_botao);
	if (!act_botao)
	{
		if (old_botao)
			tempo_1 = millis();
		old_botao = 0;
	}
	else
	{
		if (!old_botao)
		{
			old_botao = 1;
			if (millis() - tempo_1>50)
			{ 
				if (print_enable)
				{
					lcd.begin(16, 2);
					lcd.print("SETUP");
				}
				envia("R");
				return 1;
			}
		}
	}
	return 0;

}

int status_count = 0;
unsigned long status_tempo_count=0;
unsigned long status_tempo_act=0;
void status()
{
	switch (passo)
	{
	case SETUP:
		digitalWrite(pino_LED_STATUS, HIGH);
                digitalWrite(pino_LED_STATUS2,HIGH);
		break;
	case RACE:
		status_tempo_act=millis();
		if (status_tempo_act - status_tempo_count> STATUS_TEMPO)
		{	
                  digitalWrite(pino_LED_STATUS, HIGH);
                  digitalWrite(pino_LED_STATUS2,HIGH);

                }
		else
                {
		  digitalWrite(pino_LED_STATUS, LOW);
                  digitalWrite(pino_LED_STATUS2,LOW);
                }
		if (status_tempo_act-status_tempo_count > (2*STATUS_TEMPO))
                {
                        status_tempo_count=status_tempo_act;
                }
		break;
	case END:
		digitalWrite(pino_LED_STATUS, LOW);
                digitalWrite(pino_LED_STATUS2,LOW);
		break;
	}

}

char recieve()
{
	if (Serial.available())
	{
		lcd.begin(16, 2);
		lcd.print("INTERFACE MODE");
		print_enable = false;
		return Serial.read();
	}
	else
		return 0;
}



bool detetor(byte num)
{
	if (num == 1)
	{
		if (analogRead(pino_det_1) < DETETOR_THRESHOLD)
		{ 
			digitalWrite(pino_LED_DET_1, HIGH);
			return HIGH;
		}
		else
		{ 
			digitalWrite(pino_LED_DET_1, LOW);
			return LOW;
		}
	}
	if (num == 2)
	{
		if (analogRead(pino_det_2) < DETETOR_THRESHOLD)
		{
			digitalWrite(pino_LED_DET_2, HIGH);
			return HIGH;
		}
		else
		{
			digitalWrite(pino_LED_DET_2, LOW);
			return LOW;
		}
	}
}
