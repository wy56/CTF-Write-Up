#!/usr/bin/env python
import subprocess

flag = ''

for id in range(0, 45):
    command = ('curl -i  http://104.199.235.135:31331/index.php?p=' + str(id))
    content = subprocess.check_output(command, shell=True)
    flag += content[content.find('Content-Length')-3]
    
print(flag)
