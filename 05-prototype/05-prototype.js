class Student {
    constructor(name, group) {
        this.name = name
        this.group = group
    }

    clone() {
        return new this.constructor(this.name, this.group)
    }
}

Student.prototype.describe = function () {
    return `User: ${this.name} group: ${this.group}`
}

const defaultUser = new Student("Default User", "Class 3B")

const user2 = defaultUser.clone()
user2.name = "Molly"

console.log(defaultUser.describe()); // User: Default User group: Class 3B
console.log(user2.describe());       // User: Molly group: Class 3B
