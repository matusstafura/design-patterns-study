package main

import "fmt"

type Club struct {
	Name   string
	League string
}

func NewClub(name, league string) *Club {
	return &Club{
		Name:   name,
		League: league,
	}
}

func (c *Club) clone() *Club {
	return &Club{
		Name:   c.Name,
		League: c.League,
	}
}

func main() {
	team1 := NewClub("panthers", "nhl")

	team2 := team1.clone()
	team2.Name = "kings"

	fmt.Println(team1)
	fmt.Println(team2)
}
