package com.rugoli.calculator

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import com.github.ajalt.timberkt.d
import java.text.DecimalFormat

class MainActivity : AppCompatActivity() {

    // global variables
    var result:Double = 0.0
    var number:Double = 0.0
    var operation:String = ""
    // true if we need to clean the tresult
    var clean:Boolean = false

    override fun onCreate(savedInstanceState: Bundle?) {
        d { "rugolid: oncreate... empezamos" }
        //to see actual states
        d { "rugolid STATES: " + result.toString() + " " + number.toString() + " " + operation + " "+clean.toString()}
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        // numbers buttons
        val button0 = findViewById<Button>(R.id.button0)
        val button1 = findViewById<Button>(R.id.button1)
        val button2 = findViewById<Button>(R.id.button2)
        val button3 = findViewById<Button>(R.id.button3)
        val button4 = findViewById<Button>(R.id.button4)
        val button5 = findViewById<Button>(R.id.button5)
        val button6 = findViewById<Button>(R.id.button6)
        val button7 = findViewById<Button>(R.id.button7)
        val button8 = findViewById<Button>(R.id.button8)
        val button9 = findViewById<Button>(R.id.button9)

        // reset, share and comma buttons
        val breset = findViewById<Button>(R.id.breset)
        val bshare = findViewById<Button>(R.id.bshare)
        val bcoma = findViewById<Button>(R.id.bcoma)

        // operations buttons
        val bsumar = findViewById<Button>(R.id.bsumar)
        val brestar = findViewById<Button>(R.id.brestar)
        val bmulti = findViewById<Button>(R.id.bmulti)
        val bdividir = findViewById<Button>(R.id.bdividir)

        val bigual = findViewById<Button>(R.id.bigual)

        // result Text View
        val tresult = findViewById<TextView>(R.id.result)

        val operations = arrayOf("+", "-", "*", "/")

        // onclick actions for numbers
        val numbers = arrayOf(button0,button1,button2,button3,button4,
                button5,button6,button7,button8,button9)
        for ((index, element) in numbers.withIndex()) {
            element.setOnClickListener {
                if (tresult.text.toString() == "0") {
                    tresult.text = ""
                }
                if (clean) {
                    tresult.text = ""
                }
                tresult.text = tresult.text.toString() + index.toString()
                clean = false
            }
        }

        // coma button
        bcoma.setOnClickListener {
            //check if there's a coma
            d {"check coma: " + tresult.text.toString().indexOf(',').toString()}
            if (tresult.text.toString().indexOf(',') == -1){
                tresult.text = tresult.text.toString() + ","
            }
        }

        // onclick AC/reset button
        breset.setOnClickListener {
            tresult.text = "0"
            result = 0.0
            number = 0.0
            operation = ""
            clean = false
        }

        // onclick actions for operations
        val boperations = arrayOf(bsumar, brestar, bmulti, bdividir)
        for ((index, element) in boperations.withIndex()) {
            element.setOnClickListener {
                operation = operations[index]
                clean = true
                number = 0.0
                // sólo cogemos el texto si es 0.0, porque si no perdemos la precisión
                if (result == 0.0){
                    result = convert(tresult)
                }
            }
        }

        // onclick action for bigual
        bigual.setOnClickListener {
            if (number == 0.0) {
                number = convert(tresult)
            }
            result = do_operation(operation,result,number)
            set_tresult(result,tresult)
            d {"rugolid: " + result.toString()}
        }

    }

    // we need onResume to "repaint" the textView when changed state
    override fun onResume() {
        super.onResume()
        set_tresult(result,findViewById<TextView>(R.id.result))
        d {"rugolid on RESUME"}
        d { "rugolid STATES: " + result.toString() + " " + number.toString() + " " + operation + " "+clean.toString()}
    }

    // function to "draw" the result into TextView
    fun set_tresult(result:Double,tresult:TextView){
        if (check_decimals(result)) {
            tresult.text = result.toInt().toString()
        } else {
            // change decimal "." into spanish ","
            tresult.text = DecimalFormat("#.##########").format(result).replace('.',',')
        }
    }

    // convert textview into double
    fun convert(textView: TextView):Double{
        return textView.text.toString().replace(',','.').toDouble()
    }

    // check if the Double has decimals
    fun check_decimals(number:Double):Boolean {
        return (number.toInt().toDouble() == number)
    }

    // check which operation must be done
    fun do_operation(operation:String,n1:Double,n2:Double):Double{
        when (operation){
            "+" -> return sumar(n1,n2)
            "-" -> return restar(n1,n2)
            "*" -> return multiplicar(n1,n2)
            "/" -> return dividir(n1,n2)
            else -> return 0.0 //never
        }
    }

    // operation functions
    fun sumar(n1:Double,n2:Double):Double {
        return n1+n2
    }

    fun restar(n1:Double,n2:Double):Double {
        return n1-n2
    }

    fun multiplicar(n1:Double,n2:Double):Double{
        return n1*n2
    }

    fun dividir(n1:Double,n2:Double):Double{
        return n1/n2
    }

    // Function to save the Instance state
    override fun onSaveInstanceState(outState: Bundle) {
        super.onSaveInstanceState(outState)
        outState.putDouble("result",result)
        outState.putDouble("number",number)
        outState.putString("operation",operation)
        outState.putBoolean("clean",clean)
        d {"rugolid onSaveInstanceState"}
        d { "rugolid STATES: " + result.toString() + " " + number.toString() + " " + operation + " "+clean.toString()}
    }

    // Function to restore the Instance state
    override fun onRestoreInstanceState(savedInstanceState: Bundle) {
        super.onRestoreInstanceState(savedInstanceState)
        result = savedInstanceState.getDouble("result")
        number = savedInstanceState.getDouble("number")
        // getString espera String?, así que tengo que añadir el "toString()"
        operation = savedInstanceState.getString("operation").toString()
        clean = savedInstanceState.getBoolean("clean")
        d {"rugolid onRestoreInstanceState"}
        d { "rugolid STATES: " + result.toString() + " " + number.toString() + " " + operation + " "+clean.toString()}
    }
}