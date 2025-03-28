package main

import "fmt"

type Character struct {
	char string
}

func (c Character) render() {
	fmt.Println("Rendering:", c.char)
}

type CharacterFactory struct {
	chars map[string]Character
}

func (cf *CharacterFactory) getChar(c string) Character {
	if _, ok := cf.chars[c]; !ok {
		cf.chars[c] = Character{char: c}
	}
	return cf.chars[c]
}

func (cf *CharacterFactory) getCharsAndLen() {
	fmt.Printf("Total unique characters: %d\n", len(cf.chars))
	for _, v := range cf.chars {
		fmt.Printf(" - %s\n", v.char)
	}
}

func main() {
	factory := &CharacterFactory{chars: make(map[string]Character)}

	word := "Hello World"
	for _, c := range word {
		if c != ' ' {
			char := factory.getChar(string(c))
			char.render()
		}
	}

	factory.getCharsAndLen()
}
