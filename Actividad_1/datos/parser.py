#!/usr/bin/env python3

import pandas as pd
# datos cogidos de: 
# https://www.opendata.euskadi.eus/webopd00-dataset/es/contenidos/ds_recursos_turisticos/restaurantes_sidrerias_bodegas/es_res/index.shtml

df = pd.read_json("restaurantes.json")

#Index(['documentName', 'documentDescription', 'templateType', 'locality',
#        'qualityQ', 'qualityIconDescription', 'phone', 'address', 'marks',
#        'physical', 'visual', 'auditive', 'intellectual', 'organic',
#        'qualityAssurance', 'tourismEmail', 'web', 'room', 'productClub',
#        'visit', 'capacity', 'store', 'postalCode', 'restorationType',
#        'recomended', 'recomendedURLIcon', 'recomendedIconDescription',
#        'restaurant', 'bodega', 'michelinStar', 'repsolSun',
#        'latitudelongitude', 'latwgs84', 'lonwgs84', 'municipality',
#        'municipalitycode', 'territory', 'territorycode', 'country',
#        'countrycode', 'friendlyUrl', 'physicalUrl', 'dataXML', 'metadataXML',
#        'zipFile'],
#       dtype='object')

pd.set_option('display.max_rows', None)

# Quitamos el +34, (+34) del teléfono y los espacios
df['phone'] = df['phone'].str.replace('\(?\+34\)?','', regex=True).str.replace(' ','')

# Simplificamos el territorio de Álava para quitar el euskera
df['territory'] = df['territory'].str.replace('Araba/Álava','Álava', regex=True)

# Lo mismo pero para Municipios. Normalmente sigue el patrón  euskera/castellano, menos unos pocos, que los
# cambio a mano:
df['municipality'] = df['municipality'].str.replace('Elburgo/Burgelu','Elburgo', regex=True)
df['municipality'] = df['municipality'].str.replace('Labastida/Bastida','Bastida', regex=True)
df['municipality'] = df['municipality'].str.replace('Ayala/Aiara','Ayala', regex=True)
df['municipality'] = df['municipality'].str.replace('Campezo/Kanpezu','Campezo', regex=True)
df['municipality'] = df['municipality'].str.replace('Villabuena de Álava/Eskuernaga','Villabuena de Álava', regex=True)
df['municipality'] = df['municipality'].str.replace('Baños de Ebro/Mañueta','Baños de Ebro', regex=True)
df['municipality'] = df['municipality'].str.replace('Lanciego/Lantziego','Lanciego', regex=True)
df['municipality'] = df['municipality'].str.replace('Elvillar/Bilar','Elvillar', regex=True)

# el resto con una regexp quito todo lo que hay antes del "/" y así me quedo con el nombre en castellano:
df['municipality'] = df['municipality'].str.replace('.*/','',regex=True)

# convertimos el campo de estrellas Michelin: si está vacío le ponemos 0 y luego a integer
df['michelinStar'] = df['michelinStar'].str.replace('^$','0',regex=True)
df['michelinStar'] = pd.to_numeric( df['michelinStar'],downcast="integer")

# convertimos el campo de sala de conferencias: si está vacío le ponemos 0 y luego a integer
df['room'] = df['room'].str.replace('^$','0',regex=True)
df['room'] = pd.to_numeric( df['room'],downcast="integer")

# convertimos el código postal: si está vacío le ponemos 0 y luego a integer
df['postalCode'] = df['postalCode'].str.replace('^$','0',regex=True)
df['postalCode'] = pd.to_numeric( df['postalCode'],downcast="integer")

# Las provincias están escritas en mayúsculas, mínusculas... las ponemos bien
df['territory'] = df['territory'].str.replace('Gipuzkoa Gipuzkoa','Gipuzkoa', regex=True)
df['territory'] = df['territory'].str.capitalize()

# df['documentDescription'] = df['documentDescription'].str.replace(',',' ', regex=True)
# df['address'] = df['address'].str.replace(',',' ', regex=True)

# renombramos columnas, para que quede en castellano
df.rename(columns = {'documentName':'Nombre'}, inplace = True)
# df.rename(columns = {'documentDescription':'Descripción'}, inplace = True)
df.rename(columns = {'municipality':'Municipio'}, inplace = True)
df.rename(columns = {'phone':'Teléfono'}, inplace = True)
df.rename(columns = {'address':'Dirección'}, inplace = True)
df.rename(columns = {'physical':'Acceso para discapacitados'}, inplace = True)
df.rename(columns = {'tourismEmail':'e-mail'}, inplace = True)
df.rename(columns = {'room':'Sala de conferencias'}, inplace = True)
df.rename(columns = {'capacity':'Capacidad'}, inplace = True)
df.rename(columns = {'postalCode':'Código Postal'}, inplace = True)
df.rename(columns = {'restorationType':'Tipo'}, inplace = True)
df.rename(columns = {'michelinStar':'Estrella Michelin'}, inplace = True)
df.rename(columns = {'territory':'Provincia'}, inplace = True)
df.rename(columns = {'latitudelongitude':'GPS'}, inplace = True)

# quitamos un campo que tiene la provincia vacía
df = df[df['Provincia']!='']
# quitamos los que no tienen tipo (hay 2)
df = df[df['Tipo']!='']

df[['Nombre', 'Municipio','Teléfono', 'Dirección', 'Código Postal', 'Provincia', #'marks',
       'Acceso para discapacitados','e-mail', 'web', 'Capacidad',  'Tipo', 'Sala de conferencias', 
       'Estrella Michelin','GPS'
]].to_csv('restaurantes_parseado.csv', index=False)
# print(df['Sala de conferencias'])