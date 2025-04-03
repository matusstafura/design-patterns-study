class Server:
    def access(self) -> str:
        return "access granted"

class ServerProxy:
    def __init__(self, server: Server, is_admin: bool):
        self.server = server
        self.is_admin = is_admin

    def access(self) -> str:
        if self.is_admin == False:
            return "access denied"
        
        return self.server.access()

s = Server()
admin = ServerProxy(s, True)
print("admin:", admin.access())

guest = ServerProxy(s, False)
print("guest:", guest.access())
