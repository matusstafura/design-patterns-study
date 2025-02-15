class Service {
    createSender() {
        throw new Error("not implemented");
    }
    createLogger() {
        throw new Error("not implemented");
    }
}

class EmailService extends Service {
    createSender() {
        return new EmailSender();
    }

    createLogger() {
        return new EmailLogger();
    }
}

class PushService extends Service {
    createSender() {
        return new PushSender();
    }

    createLogger() {
        return new PushLogger();
    }
}

class EmailSender {
    send() {
        return "sending email"
    }
}

class EmailLogger {
    log() {
        return "email log saved"
    }
}

class PushSender {
    send() {
        return "push notification sent"
    }
}

class PushLogger {
    log() {
        return "push log saved"
    }
}

class Client {
    #sender;
    #logger;

    constructor(service) {
        this.#sender = service.createSender();
        this.#logger = service.createLogger();
    }

    process() {
        console.log(this.#sender.send())
        console.log(this.#logger.log())
    }
}

c = new Client(new EmailService())
c.process()
