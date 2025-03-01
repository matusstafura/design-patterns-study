## Composite Pattern

- a structural design pattern
- make sense only when the objects are part of a tree structure
- you can use iterators to traverse the tree

### Usage

- when you have to implement a tree-like structure
- when you need to treat individual objects and compositions of objects uniformly

### Components

- Component(Abstract class or Interface): declares the interface for objects in the composition
- Leaf(Concrete Class): represents leaf objects in the composition
- Composite(Concrete Class): represents a composite object in the composition

## Cons

- debugging can be difficult due to recursive nature of the pattern
- can be overkill if the tree structure is simple


