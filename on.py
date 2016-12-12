#! /usr/bin/python

import sys
import time
import RPi.GPIO as GPIO

PIN_17 = 17 # Define LED colour and their GPIO pin
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

#GPIO.setup(PIN_17, GPIO.OUT) # Setup GPIO pin

a = sys.argv[1]

if (int(a) == 1):
    GPIO.setup(PIN_17, GPIO.OUT) # Setup GPIO pin
    GPIO.output(PIN_17, GPIO.HIGH)  #Turn on
    #GPIO.output(PIN_17, True)  #Turn on
    time.sleep (1)               #Wait

if (int(a) == 0):
    GPIO.setup(PIN_17, GPIO.OUT) # Setup GPIO pin
    GPIO.output(PIN_17, GPIO.LOW) #Turn off
    #GPIO.output(PIN_17, False) #Turn off
    time.sleep (1)               #Wait

GPIO.cleanup() #Useful to clear the board
