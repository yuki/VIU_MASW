
import json
import re
f = open("restaurantes.json",'r')
f.close()

out = json.loads('[]')
with open('restaurantes.json', 'r', encoding='utf8') as fichero:
    lector = json.load(fichero)
    for linea in lector:
        o = json.loads('{}')
        if 'documentName' in linea:
            o.update({"documentName":linea['documentName']})
        if 'turismDescription' in linea:
            o.update({"turismDescription":linea['turismDescription']})
        if 'restorationType' in linea:
            o.update({"restorationType":linea['restorationType']})
        if 'phone' in linea:
            # quitamos los espacios y los "+" del teléfono
            phone = linea['phone'].replace(" ","")
            phone = phone.replace("+","")
            o.update({"phone":int(phone)})
        if 'tourismEmail' in linea:
            o.update({"tourismEmail":linea['tourismEmail']})
        if 'web' in linea:
            o.update({"web":linea['web']})
        if 'address' in linea:
            o.update({"address":linea['address']})
        if 'postalCode' in linea:
            x = 0
            if len(linea['postalCode']) > 0:
                x = int(linea['postalCode'])
            o.update({"postalCode":x})
        if 'municipality' in linea:
            o.update({"municipality":linea['municipality']})
        if 'territory' in linea:
            o.update({"territory":linea['territory']})
        if 'capacity' in linea:
            x = 0
            if len(linea['capacity']) > 0:
                matched=re.search("[^\d]",linea['capacity'])
                if matched==None:
                    x = int(linea['capacity'])
                else:
                    x = linea['capacity']
            o.update({"capacity":x})
        if 'michelinStar' in linea:
            x = 0
            if len(linea['michelinStar']) > 0:
                x = int(linea['michelinStar'])
            o.update({"michelinStar":x})
        lat = 0
        if 'latwgs84' in linea:
            if len(linea['latwgs84']) > 0:
                lat = float(linea['latwgs84'])
        long = 0
        if 'lonwgs84' in linea:
            if len(linea['lonwgs84']) > 0:
                long = float(linea['lonwgs84'])
        if lat != 0 or long !=0:
            coord = json.loads('{}')
            coord.update({"location":{"type":"Point","coordinates": [long,lat]}})
            o.update(coord)
        out.append(o)
out_file = open("parseado.json","w")
json.dump(out,out_file,ensure_ascii = False)
out_file.close()
