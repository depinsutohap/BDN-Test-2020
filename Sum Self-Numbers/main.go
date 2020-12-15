package main

import (
    "fmt"
)

func main() {
    fmt.Print("Enter Number: ")
    var input int
    fmt.Scanln(&input)
    if input == 0 {
        fmt.Print("Input Must be Number!")
    }else{
        if input > 0 && input < 10000 {
            result := 0
            for i:=1; i <= 10000; i++{
                if checkNum(i){
                    result += i
                }
            }
            fmt.Print(result)
        }else{
            fmt.Print("Number Must be more than 0 and less than 10000")
        }
    }
}
func getcalc(n int) int{
    sum := 0
    for n != 0{
        sum += n %10
        n = int(n /10)
    }
    return sum
}
func checkNum(n int) bool{
    for i:=1; i <= n+1; i++{
        if i + getcalc(i) == n{
            return false
        }
    }
    return true
}