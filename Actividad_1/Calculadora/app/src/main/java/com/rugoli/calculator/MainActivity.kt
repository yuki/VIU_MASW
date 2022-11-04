package com.rugoli.calculator

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import com.github.ajalt.timberkt.d
import org.w3c.dom.Text

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        d {"rugolid: oncreate... empezamos"}
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

        // reset and share buttons
        val breset = findViewById<Button>(R.id.breset)
        val bshare = findViewById<Button>(R.id.bshare)

        // operations buttons
        val bsumar = findViewById<Button>(R.id.bsumar)
        val brestar = findViewById<Button>(R.id.brestar)
        val bmulti = findViewById<Button>(R.id.bmulti)
        val bdividir = findViewById<Button>(R.id.bdividir)

        val bigual = findViewById<Button>(R.id.bigual)

        // result Text View
        val tresult = findViewById<TextView>(R.id.result)

        // variables
        var number1:Double = 0.0
        var number2:Double = 0.0
        var result:Double = 0.0
        val operations = arrayOf("+","-","*","/")
        var operation:String = "+"
        // true if we clean the tresult
        var clean:Boolean = false

        // onclick actions for numbers
        val numbers = arrayOf(button0,button1,button2,button3,button4,button5,button6,button7,button8,button9)
        for ((index, element) in numbers.withIndex()){
            element.setOnClickListener {
                if (tresult.text.toString() == "0"){
                    tresult.text = ""
                }
                if (clean){
                    tresult.text = ""
                }
                tresult.text = tresult.text.toString() +  index.toString()
                clean = false
            }
        }

        // onclick AC/reset button
        breset.setOnClickListener {
            tresult.text = "0"
            operation = ""
            clean = false
        }


        // onclick actions for operations
        val boperations = arrayOf(bsumar,brestar,bmulti,bdividir)
        for ((index, element) in boperations.withIndex()){
            element.setOnClickListener {
                operation = operations[index]
                clean = true

                if (number1 == 0.0){
                    number1 = tresult.text.toString().toDouble()
                } else {
                    number2 = tresult.text.toString().toDouble()
                    number1 = do_operation(operation,number1,number2)
                    tresult.text = number1.toString()
                }
                // d {"rugolid " + number1.toString() + " " + operation}
            }
        }

    }

    fun do_operation(operation:String,number1:Double,number2:Double):Double{
        when (operation){
            "+" -> return sumar(number1,number2)
            "-" -> return restar(number1,number2)
            "*" -> return multiplicar(number1,number2)
            "/" -> return dividir(number1,number2)
            else -> return 0.0
        }
    }

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
}