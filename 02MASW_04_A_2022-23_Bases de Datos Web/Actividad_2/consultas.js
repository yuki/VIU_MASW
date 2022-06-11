use salidas_grupales

db.restaurantes.find({"restorationType" : "Sidreria"},{"documentName":1,"address":1,"postalCode":1,"municipality":1,"territory":1,"phone":1,"_id":0})

db.restaurantes.find({"restorationType" : "Asador", "municipality":"Bilbao"},{"documentName":1,"address":1,"phone":1,"_id":0})

db.restaurantes.find({"restorationType":"Restaurante", "turismDescription": /(vegetarian[ao]|vegan[ao])/},{"documentName":1,"turismDescription":1,"address":1,"municipality":1,"phone":1,"_id":0})

db.restaurantes.createIndex( { location: "2dsphere" } )

db.restaurantes.find({
    "location":
        { $geoNear:
          {
            $geometry: { type: "Point",  coordinates: [ -2.9388531, 43.2577024 ] },
            $maxDistance: 2000
          }
        }
    },{"documentName":1,"address":1,"phone":1,"_id":0})
