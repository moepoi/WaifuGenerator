from bs4 import BeautifulSoup
from random import randint
from random import choice
import requests, lxml

hasil = []
pagez = randint(1, 9)
req1 = "http://jurnalotaku.com/page/{}/?s=%5Bwaifu+wednesday%5D".format(str(pagez))
req2 = "http://jurnalotaku.com/?s=%5Bwaifu+wednesday%5D"
reqs = [req1,req2]
req = requests.get(choice(reqs))
soup = BeautifulSoup(req.text, "lxml")
for xx in soup.find_all('div', {'class':'article-inner-wrapper'}):
    for zz in xx.find_all('div', {'class':'cover size-a has-depth'}):
        for ff in zz.find_all('img'):
            images = ff.get('src')
            namez = ff.get('alt')
            names = namez.replace("[Waifu Wednesday] ","")
print ("Name : {}\nImage : {}".format(str(names), str(images)))
