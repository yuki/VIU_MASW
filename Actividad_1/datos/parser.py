#!/usr/bin/env python3

import pandas as pd
import re


df = pd.read_csv("restaurantes.csv",sep="=",header=0,usecols=['Nombre','Tipo de Plantilla', 'Teléfono', 'Dirección', 'Marcas','Diversidad functional física ', 'Diversidad functional visual ',
       'Diversidad functional auditiva ', 'Diversidad functional intelectual ','Email', 'WEB', 'Capacidad','Postal Code', 'Tipo de Restauración',  'Estrellas Michelin', 'Coordenadas GPS', 'Municipio', 'Provincia'])
print(df.head())
