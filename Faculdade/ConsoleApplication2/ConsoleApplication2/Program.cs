﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication2
{
    class Program
    {
        static void Main(string[] args)
        {
            double preco, novo_preco;

                Console.WriteLine(" Coloque o preço do produto: ");
                preco = Convert.ToDouble (Console.Read());
                novo_preco = preco * 0.9 ;
                Console.WriteLine(" O preço do produto com desconte é: "+ novo_preco);

        }
    }
}