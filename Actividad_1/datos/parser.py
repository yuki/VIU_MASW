#!/usr/bin/env python3

import pandas as pd
import json
import re
from datetime import datetime
# 2000 datos cogidos de: 
# https://www.opendata.euskadi.eus/api-culture/?api=culture_events#/events/findEvents

# curl -X GET "https://api.euskadi.eus/culture/events/v1.0/events?_elements=5000&_page=1" -H "accept: application/json"
# df = pd.read_json("beneficiarios3.json",dtype=True)

tipos = ["Concierto","Teatro","Exposición","Danza",'',"Conferencia",
       "Bertsolarismo","Feria","Proyección Audiovisual",'',"Formación",
       "Concurso" "Festival","Actividad Infantil","Otro","Fiestas"]

out = json.loads('[]')
with open('eventos_items.json', 'r', encoding='utf8') as fichero:
       lector = json.load(fichero)
       for linea in lector:
              o = json.loads('{}')
              o.update({"Nombre":re.sub('\"','',linea['nameEs'].title())})
              o.update({"Tipo":linea['typeEs']})
              d = re.sub('T.*','',linea['startDate'])
              d = re.sub('-','',d)
              o.update({"Fecha inicio":d})
              d = re.sub('T.*','',linea['endDate'])
              d = re.sub('-','',d)
              o.update({"Fecha fin":d})
              if 'municipalityLatitude' in linea and 'municipalityLongitude' in linea:
                     o.update({"GPS":linea['municipalityLatitude']+','+linea['municipalityLongitude']})
              if 'municipalityEs' in linea:
                     o.update({"Municipio":linea['municipalityEs']})
              if 'language' in linea:
                     d = linea['language']
                     d = re.sub('NA','',d)
                     o.update({"Idioma":d})
                     print(d)
              else:
                     o.update({"Idioma":''})
              if 'priceEs' in linea:
                     o.update({"Precio":linea['priceEs']})
              else:
                     o.update({"Precio":'Gratis'})
              if linea['provinceNoraCode'] == '48':
                     o.update({'Provincia':'Bizkaia'})
              if linea['provinceNoraCode'] == '1':
                     o.update({'Provincia':'Araba'})
              if linea['provinceNoraCode'] == '20':
                     o.update({'Provincia':'Gipuzkoa'})
              if linea['provinceNoraCode'] == '31':
                     o.update({'Provincia':'Navarra'})
              if linea['provinceNoraCode'] == '-3':
                     o.update({'Provincia':'Iparralde'})
              out.append(o)


out_file = open("parseado.json","w")
json.dump(out,out_file,ensure_ascii = False)
out_file.close()

df = pd.read_json('parseado.json',dtype=True)


print(df.columns)
df.to_csv('eventos.csv', index=False)
