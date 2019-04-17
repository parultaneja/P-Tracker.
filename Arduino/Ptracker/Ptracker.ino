#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

int sensorValue;
int ledpin = 16;

#include<string.h>
byte buff[2];
int pin = D8;//DSM501A input D8
unsigned long duration;
unsigned long starttime;
unsigned long endtime;
unsigned long sampletime_ms = 30000;
unsigned long lowpulseoccupancy = 0;
float ratio = 0;
float concentration = 0;
//////Wi-Fi**Connection////////// 
const char* ssid = "ptracker";
const char* password = "ptracker";
 
String server = "http://ptrackr.000webhostapp.com/g_update.php?id=\"P01\"&aqi=";
WiFiClient client;
   
 
void setup() {                
  Serial.begin(115200);
  delay(10);
  pinMode(12,INPUT);
  pinMode(16,OUTPUT);
starttime = millis(); 
  
  
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
}
 
 
void loop() {
   
/////////////////////////////*********DSM501A*******//////////////////////////////
 duration = pulseIn(pin, LOW);
  lowpulseoccupancy += duration;
  endtime = millis();
  if ((endtime-starttime) > sampletime_ms)
  {
    ratio = (lowpulseoccupancy-endtime+starttime + sampletime_ms)/(sampletime_ms*10.0);  // Integer percentage 0=>100
    concentration = (1.1*pow(ratio,3)-3.8*pow(ratio,2)+520*ratio+0.62)/50; // using spec sheet curve
    Serial.print("lowpulseoccupancy:");
    Serial.print(lowpulseoccupancy);
    Serial.print("    ratio:");
    Serial.print(ratio);
    Serial.print("    DSM501A:");
    Serial.println(concentration);
    lowpulseoccupancy = 0;
    starttime = millis();
         
      HTTPClient http;    //Declare object of class HTTPClient
    
    String Link = server+String(concentration);
    Serial.println(Link);
     http.begin(Link);     //Specify request destination
      
      int httpCode = http.GET();            //Send the request
      String payload = http.getString();    //Get the response payload
    
      Serial.println(httpCode);   //Print HTTP return code
      Serial.println(payload);    //Print request response payload
    
      http.end();//Close connection
      Serial.println("Closing connection...");

  
  }
  /*
  ////////thingspeak ping//////// 
  if (client.connect(server,80)) {  //   "184.106.153.149" or api.thingspeak.com
    String postStr = apiKey;
           postStr += String(concentration);
            
          
     client.print("POST /update HTTP/1.1\n"); 
     client.print(postStr);
           
  }
  client.stop();
   
  Serial.println("Waiting...");    
*/ 

 }
