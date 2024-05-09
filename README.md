# [WIP] Symfony REST API Shop

- - -

## Introduction ##
### Shop example project based on Symfony, using REST API to call the shots.
### In this very case, each Order request is not being processed straight away. That's because each API Order request dispatches Command which is supposed to be handled by specific CommandHandler. Thanks to Symfony Messenger and configured RabbitMQ queue, consumer is able to collect dispatched commands and call specific CommandHandler to process command asynchronously.

### W I P :tada: