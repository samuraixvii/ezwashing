#include <ESP8266WiFi.h>
#include <PubSubClient.h>

// Update these with values suitable for your network.
const char* ssid = "sukiza2544";
const char* password = "zxcasdqwe123";
const char* mqtt_server = "broker.mqttdashboard.com";
String state;

WiFiClient espClient;
PubSubClient client(espClient);

long count = 0;
long lastMsg = 0;
char destinationTopic[]   = "ezwashing/mach1";

void setup_wifi() {

  delay(10);
  // We start by connecting to a WiFi network
  Serial.println();
  
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  randomSeed(micros());
  
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void callback(char* topic, byte* payload, unsigned int length) {
  String payloadStr = String();
  String topicStr = String(topic);
  
  // Convert byte to String
  for (int i = 0; i < length; i++) {
    payloadStr += (char)payload[i];
  }
  
  state = String(payloadStr);
  Serial.print("Message arrived [");
  Serial.print(topicStr);
  Serial.print("] : ");
  Serial.println(payloadStr);
}

void reconnect() {
  // Loop until we're reconnected
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    // Attempt to connect
    String clientId = "IoT-Workshop-";
    clientId += String(random(0xffff), HEX);
    if (client.connect(clientId.c_str())) {
      Serial.println("connected");
      // Once connected, publish an announcement...
      // Subscribing...
      client.subscribe(destinationTopic);
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      // Wait 5 seconds before retrying
      delay(1000);
    }
  }
}

void setup() {
  pinMode(BUILTIN_LED, OUTPUT);     // Initialize the BUILTIN_LED pin as an output
  Serial.begin(115200);
  setup_wifi();
  client.setServer(mqtt_server, 1883);
  client.setCallback(callback);
  pinMode(D1, OUTPUT);
  pinMode(D2, OUTPUT);
}

void loop() {
  if (!client.connected()) {
    reconnect();
  }
  client.loop();

  digitalWrite(D1, HIGH);
  
  if(state == "use")
  {
    digitalWrite(D1, LOW);
    digitalWrite(D2, HIGH);

    for(int i=5; i >= 0; i--)
    {
      
    String publishStr = "I'm Arduino. - ";
    publishStr.concat(i); // Concatenate string
   
    Serial.print("Publishing... : ");
    Serial.println(publishStr.c_str());
    client.publish(destinationTopic, publishStr.c_str());
    delay(1000);
    }
    state = "off";
  }
  else
  {
    digitalWrite(D2, LOW);
    digitalWrite(D1, HIGH);
  }
}
