# Builder

- if constructor has or may have too many parameters

```php
class PC {
    public function __construct(private string $cpu, private string $ram, private string $storage) {}
}
```

- different types need only certain components(a house has windows but garage may not need them)

- difficult to read and problem to remember the order

```php
$gamingPC = new PC("Intel i9", "32GB", "1TB SSD", "RTX 4090", "Liquid Cooling", "850W PSU");
```

- use chaining methods return $this

- properties are optional
- use Director to predefined the steps(configuration)

```php
public function buildGamingPC(): PC
{
    ...
}
public function buildOfficePC(): PC
{
    ...
}
```

##  steps

1. Define the Product class
2. Define the Fluent Builder interface
3. Create a Director class
