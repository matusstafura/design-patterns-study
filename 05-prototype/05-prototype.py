class UserProfile:
    def __init__(self, username: str, preferences: dict):
        self.username = username
        self.preferences = preferences

    def __copy__(self):
        """Shallow copy method"""
        new_instance = type(self)(self.username, self.preferences.copy())  # Creates a new object
        return new_instance

    def __deepcopy__(self, memo):
        """Deep copy method"""
        new_instance = type(self)(
            copy.deepcopy(self.username, memo),  # Copy username
            copy.deepcopy(self.preferences, memo)  # Deep copy preferences
        )
        return new_instance

    def show_info(self):
        print(f"User: {self.username}, Preferences: {self.preferences}")

# Create a prototype user with default settings
default_user = UserProfile("DefaultUser", {"theme": "dark", "language": "English"})

# Clone using `copy.copy()` - shallow copy
user1 = copy.copy(default_user)  # Uses `__copy__`
user1.username = "Alice"

# Clone using `copy.deepcopy()` - deep copy
user2 = copy.deepcopy(default_user)  # Uses `__deepcopy__`
user2.username = "Bob"
user2.preferences["language"] = "French"  # Customizing preferences

# Show user details
default_user.show_info()  # Original remains unchanged
user1.show_info()  # New user with same preferences 
user2.show_info()  # New user with customized preferences

