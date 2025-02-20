## **Prototype**

When you need a copy, but:
- some fields may be private
- the object’s creation depends on an existing instance

The Prototype pattern **declares** a common interface that lets you clone an object without coupling your code to its concrete class.

### **Shallow vs. Deep Cloning**

#### **Shallow Copy**
- does not clone referenced objects  
- if the original object changes a referenced object, it affects the cloned object too  

#### **Deep Copy**
- copies the object and all referenced objects  
- modifications to the original object do not affect the cloned object  

### **Usage**
- expensive object creation (deep copying complex objects)  
- object has many configurations (cloning avoids re-initializing)  
- subclasses differ only in properties (no need for factory methods)  
- avoids dependencies on specific classes  

### **Structure**
1. The Prototype interface declares the cloning method (usually just `clone`).  
2. The Concrete Prototype class implements the cloning method.  
3. The Client can produce a copy of any object that follows the Prototype interface.  

