
import json
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
            o.update({"phone":linea['phone']})
        if 'tourismEmail' in linea:
            o.update({"tourismEmail":linea['tourismEmail']})
        if 'web' in linea:
            o.update({"web":linea['web']})
        if 'address' in linea:
            o.update({"address":linea['address']})
        if 'postalCode' in linea:
            o.update({"postalCode":linea['postalCode']})
        if 'municipality' in linea:
            o.update({"municipality":linea['municipality']})
        if 'territory' in linea:
            o.update({"territory":linea['territory']})
        if 'capacity' in linea:
            o.update({"capacity":linea['capacity']})
        if 'michelinStar' in linea:
            o.update({"michelinStar":linea['michelinStar']})
        if 'latwgs84' in linea:
            o.update({"latwgs84":linea['latwgs84']})
        if 'lonwgs84' in linea:
            o.update({"lonwgs84":linea['lonwgs84']})
        out.append(o)
out_file = open("parseado.json","w")
json.dump(out,out_file,ensure_ascii = False)
out_file.close()
