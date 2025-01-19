import os
import cv2
from PIL import Image
import numpy as np
from collections import OrderedDict

data=[]
labels=[]

 
# ----------------
# LABELS
# Adonai Desalegn
# Amanuel Daniel
# Chala Golicha
# Kerim Seid
# Kirubel Eshetu
# Sintayehu Desalegn
# Unknown
# ----------------


# Adonai Desalegn
Adonai_Desalgen = os.listdir(os.getcwd() + "/CNN/data/Adonai_Desalgen")
for x in Adonai_Desalgen:
    imag=cv2.imread(os.getcwd() + "/CNN/data/Adonai_Desalgen/" + x)
    img_from_ar = Image.fromarray(imag, 'RGB')
    resized_image = img_from_ar.resize((50, 50))
    data.append(np.array(resized_image))
    labels.append(0)

# Amanuel Daniel
Amanuel_Daniel  = os.listdir(os.getcwd() + "/CNN/data/Amanuel_Daniel/")
for x in Amanuel_Daniel:
    imag=cv2.imread(os.getcwd() + "/CNN/data/Amanuel_Daniel/" + x)
    img_from_ar = Image.fromarray(imag, 'RGB')
    resized_image = img_from_ar.resize((50, 50))
    data.append(np.array(resized_image))
    labels.append(1)
    
    # Chala Golicha
Chala_Golicha = os.listdir(os.getcwd() + "/CNN/data/Chala_Golicha/")
for x in Chala_Golicha:
    imag=cv2.imread(os.getcwd() + "/CNN/data/Chala_Golicha/" + x)
    img_from_ar = Image.fromarray(imag, 'RGB')
    resized_image = img_from_ar.resize((50, 50))
    data.append(np.array(resized_image))
    labels.append(2)
    
    # Kerim Seid
Kerim_Seid = os.listdir(os.getcwd() + "/CNN/data/Kerim_Seid/")
for x in Kerim_Seid:
    imag=cv2.imread(os.getcwd() + "/CNN/data/Kerim_Seid/" + x)
    img_from_ar = Image.fromarray(imag, 'RGB')
    resized_image = img_from_ar.resize((50, 50))
    data.append(np.array(resized_image))
    labels.append(3)
    
    # Kirubel Eshetu
Kirubel_Eshetu = os.listdir(os.getcwd() + "/CNN/data/Kirubel_Eshetu/")
for x in Kirubel_Eshetu:
    imag=cv2.imread(os.getcwd() + "/CNN/data/Kirubel_Eshetu/" + x)
    img_from_ar = Image.fromarray(imag, 'RGB')
    resized_image = img_from_ar.resize((50, 50))
    data.append(np.array(resized_image))
    labels.append(4)
    
#Sintayehu Desalegn
Sintayehu_Desalegn = os.listdir(os.getcwd() + "/CNN/data/Sintayehu_Desalegn/")
for x in Sintayehu_Desalegn:
    imag=cv2.imread(os.getcwd() + "/CNN/data/Sintayehu_Desalegn/" + x)
    img_from_ar = Image.fromarray(imag, 'RGB')
    resized_image = img_from_ar.resize((50, 50))
    data.append(np.array(resized_image))
    labels.append(5)

#Unknown
Unkown = os.listdir(os.getcwd() + "/CNN/data/Unknown/")
for x in Unkown:
    imag=cv2.imread(os.getcwd() + "/CNN/data/Unknown/" + x)
    img_from_ar = Image.fromarray(imag, 'RGB')
    resized_image = img_from_ar.resize((50, 50))
    data.append(np.array(resized_image))
    labels.append(6)



prisoners=np.array(data)
labels=np.array(labels)
# 
np.save("prisoners", prisoners)
np.save("labels", labels)

