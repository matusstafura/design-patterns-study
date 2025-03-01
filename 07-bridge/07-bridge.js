class Notification {
    constructor() {
        if (new.target === Notification) {
            throw new Error("Cannot instantiate an abstract class");
        }
    }

    send(message) {
        throw new Error("Method not implemented");
    }
}

class Email extends Notification {
    send(message) {
        return "Sending Email: " + message;
    }
}

class SMS extends Notification {
    send(message) {
        return "Sending SMS: " + message;
    }
}

// Abstraction: Urgency levels
class Urgency {
    constructor(notification) {
        this.notification = notification;
    }

    sendMessage(message) {
        throw new Error("not implemented");
    }
}

class NotUrgent extends Urgency {
    sendMessage(message) {
        return "Not Urgent: " + this.notification.send(message);
    }
}

class Urgent extends Urgency {
    sendMessage(message) {
        return "Urgent: " + this.notification.send(message);
    }
}

const email = new Email();
const sms = new SMS();

const urgentEmail = new Urgent(email);
console.log(urgentEmail.sendMessage("API Throttling")); 
// Output: "Urgent: Sending Email: API Throttling"

const notUrgentSMS = new NotUrgent(sms);
console.log(notUrgentSMS.sendMessage("New Blog Post"));
