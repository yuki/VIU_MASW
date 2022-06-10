use salidas_grupales

db.restaurantes.find({"restorationType" : "Sidreria"})

db.restaurantes.find({"restorationType" : "Asador", "municipality":"Bilbao"},{"documentName":1,"address":1,"phone":1})

db.restaurantes.find({"restorationType":"Restaurante", "turismDescription": /(vegetarian[ao]|vegan[ao])/})
