package com.rugoli.calculator

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import com.github.ajalt.timberkt.d
import org.w3c.dom.Text

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        d { "rugolid: oncreate... empezamos" }
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
        var result:Double = 0.0
        var number:Double = 0.0
        val operations = arrayOf("+", "-", "*", "/")
        var operation:String = ""
        // true if we need to clean the tresult
        var clean:Boolean = false

        // onclick actions for numbers
        val numbers = arrayOf(button0,button1,button2,button3,button4,button5,button6,button7,button8,button9)
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
                result = tresult.text.toString().toDouble()
            }
        }

        // onclick action for bigual
        bigual.setOnClickListener {
            if (number == 0.0) {
                number = tresult.text.toString().toDouble()
            }
            result = do_operation(operation,result,number)
            if (result.toInt().toDouble() == result) {
                tresult.text = result.toInt().toString()
            } else {
                tresult.text = result.toString()
            }
        }

    }

    // check which operation must be done
    fun do_operation(operation:String,n1:Double,n2:Double):Double{
        when (operation){
            "+" -> return sumar(n1,n2)
            "-" -> return restar(n1,n2)
            "*" -> return multiplicar(n1,n2)
            "/" -> return dividir(n1,n2)
            else -> return 0.0
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
}