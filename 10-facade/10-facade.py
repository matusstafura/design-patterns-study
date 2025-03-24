class Login:
    def login(self):
        return "user logged in"

class Log:
    def save(self):
        return "log saved"

class UserLoginFacade:
    def __init__(self, login, log):
        self.login = login
        self.log = log

    def report(self):
        print(self.login.login())
        print(self.log.save())

login = Login()
log = Log()
user_login = UserLoginFacade(login, log)
user_login.report()

