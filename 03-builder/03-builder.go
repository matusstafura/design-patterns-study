package main

import "fmt"

// Product
type Computer struct {
	ram int16
	cpu string
	ssd int16
}

func (c Computer) stats() {
	fmt.Printf("RAM: %dGB, CPU: %s, SSD: %dGB\n", c.ram, c.cpu, c.ssd)
}

// Builder
type ComputerBuilder struct {
	cb Computer
}

func (b *ComputerBuilder) setRam(ram int16) *ComputerBuilder {
	b.cb.ram = ram
	return b
}

func (b *ComputerBuilder) setCpu(cpu string) *ComputerBuilder {
	b.cb.cpu = cpu
	return b
}

func (b *ComputerBuilder) setSSD(ssd int16) *ComputerBuilder {
	b.cb.ssd = ssd
	return b
}

func (b *ComputerBuilder) build() Computer {
	return b.cb
}

// Director
type Director struct {
	builder *ComputerBuilder
}

func NewDirector(b *ComputerBuilder) *Director {
	return &Director{builder: b}
}

func (d *Director) homePc() Computer {
	return d.builder.setRam(16).setCpu("3.2GHz").setSSD(512).build()
}

func main() {
	builder := &ComputerBuilder{}
	director := NewDirector(builder)

	computer := director.homePc()
	computer.stats()
}
