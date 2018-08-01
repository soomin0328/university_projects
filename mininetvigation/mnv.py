#!/usr/bin/python

import sqlite3
from mininet.net import Mininet
from mininet.util import irange,dumpNodeConnections
from mininet.log import setLogLevel, info
from mininet.cli import CLI
from mininet.node import Controller, RemoteController


#DATABASE READ
conn = sqlite3.connect('mnvDb.db')
cursor = conn.cursor()

cursor.execute('''
		SELECT startHost, endHost
		FROM hosts
		WHERE name = "soomin" ''') 

hosts  = cursor.fetchall()

#READ TEST
#print(count)
#print(hosts[1][1])

setLogLevel('info')

#SET CONTROLLER
net = Mininet(controller=None)
net.addController('c0',controller=RemoteController,ip='127.0.0.1',port=6633)

#SET SWITCHES
s1 = net.addSwitch('s1')
s2 = net.addSwitch('s2')
s3 = net.addSwitch('s3')
s4 = net.addSwitch('s4')
s5 = net.addSwitch('s5')

#SET HOSTS
h1 = net.addHost('h1')
h2 = net.addHost('h2')
h3 = net.addHost('h3')
h4 = net.addHost('h4')
h5 = net.addHost('h5')

#SET SWITCH-HOST LINKS
net.addLink(h1,s1)
net.addLink(h2,s2)
net.addLink(h3,s3)
net.addLink(h4,s4)
net.addLink(h5,s5)

#SET SWITCH-SWITCH LINKS
i=0
while(i<len(hosts)):
	net.addLink('s%s' % hosts[i][0], 's%s' % hosts[i][1])
	i += 1

#MININET START
net.start()

#RESULT: PLOSS PACKET LOSS PERCENTAGE
cursor.execute('''
	SELECT startHost, endHost
	FROM ping
	WHERE name = "soomin" ''')

pings = cursor.fetchall()

s = pings[0][0]
e = pings[0][1]

result=0.0

if(s==1):
	if(e==2):
		result = net.ping([h1,h2])
	elif(e==3):
		result = net.ping([h1,h3])
	elif(e==4):
		result = net.ping([h1,h4])
	elif(e==5):
		result = net.ping([h1,h5])
elif(s==2):
	if(e==1):
		result = net.ping([h2,h1])
	elif(e==3):
		result = net.ping([h2,h3])
	elif(e==4):
		result = net.ping([h2,h4])
	elif(e==5):
		result = net.ping([h2,h5])
elif(s==3):
	if(e==1):
		result = net.ping([h3,h1])
	elif(e==2):
		result = net.ping([h3,h2])
	elif(e==4):
		result = net.ping([h3,h4])
	elif(e==5):
		result = net.ping([h3,h5])
elif(s==4):
	if(e==1):
		result = net.ping([h4,h1])
	elif(e==2):
		result = net.ping([h4,h2])
	elif(e==3):
		result = net.ping([h4,h3])
	elif(e==5):
		result = net.ping([h4,h5])
elif(s==5):
	if(e==1):
		result = net.ping([h5,h1])
	elif(e==2):
		result = net.ping([h5,h2])
	elif(e==3):
		result = net.ping([h5,h3])
	elif(e==4):
		result = net.ping([h5,h4])

if(result == 0.0):
	print('Ping Success!')
else:
	print('FAIL')


#START CLI
CLI(net)

#MININET STOP
net.stop()
