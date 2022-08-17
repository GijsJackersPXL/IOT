#ifndef HTTP_H
#define HTTP_H
#include "main.h"

#define HTTP_CLIENT_TASK_STACK_SIZE (10 * 1024)

TaskHandle_t httpSend_task_handle;
cy_http_client_response_t response;

void disconnect_callback(void *arg);

char front[25] = "value=";
char value[6];
char end[] = "&sensor_id=";

int sensor_type = 0;

bool connected;

#define REQUEST_BODY "value=71&sensor_id=2"
#define REQUEST_BODY_LENGTH (sizeof(REQUEST_BODY) - 1)
#define BUFFERSIZE (2048 * 2)
#define TESTPATH "/IOT/DataVerzamelen/WaardeToevoegen.php"
#define SERVERHOSTNAME "11901795.pxl-ea-ict.be"
#define SERVERPORT (80)
#define SENDRECEIVETIMEOUT (5000)

#endif