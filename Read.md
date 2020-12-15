# 1. Cargo System Validator
Please Make sure you already have php installed in you'r local machine
## Run program
Open terminal/command prompt with the directory of this repo
```bash
php -S localhost:8000 -t '.\Cargo System Validation\'
```
##Usage
Open Postman Collection in Cargo System Validator folder
and use Postman like usual.

##Use it properly
Please use valid json format.
you can add as much as many item you want.
for example
``` json
[{"packageId": "item001", "type": "S", "width": 5, "height": 8, "length": 2, "weight": 5},
{"packageId": "item002", "type": "L", "temperature": 25, "weight": 6}, 
{"packageId": "item003", "type": "L", "temperature": 19, "weight": 6}, 
{"packageId": "item004", "type": "S", "width": "1", "height": 15, "length": 2, "weight":1}, 
{"packageId": "item005", "type": "S", "width": 1, "height": "1", "length": 10, "weight":2}, 
{"packageId": "item006", "type": "L", "temperature": 25, "weight":10}]
```
"type": "S" mean Solid and "type": "L" Liquid
For Solid item the key needed only width, height, length, weight 
For Liquid temperature and weight 
All of the must be number or the program will return REJECT
if one of the key is not exist the proram will return REJECT

#2 Sum Self-Numbers
Please make sure you already have go in you'r local machine
##Run Program
Open terminal/command prompt with the directory of this repo
go run Sum Self-Numbers\main.go

#3