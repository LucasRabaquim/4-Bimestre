using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using TesteWeb.Models;

namespace TesteWeb.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            return View();
        }
        public ActionResult Usuario()
        {
            var usuario = new Usuario(); // CRIANDO O OBJETO PARA A CLASSE
            return View(usuario); // Retorna para a view os dados da classe
        }
        [HttpPost]
        public ActionResult Usuario(Usuario usuario)
        {
            if (ModelState.IsValid) // Validando o estado, ou seja, verificando a requisição
            {
                return View("Resultado", usuario); // Retorna para a view resultado
            }
            return View(usuario); //
        }

        public ActionResult Resultado(Usuario usuario) { return View(usuario); }

       /* public ActionResult LoginUnico(string login)
        {
            var bdExemplo = new Collection<string>
            {
                "Layla",
                "Nivia",
                "Maria"
            };
            return Json(bdExemplo.All(x => x.ToLower() !=))
        }*/
    }
}

/*
 #include <iostream>
#include <stdlib.h>  
int main(){
char caracter;
std::cout << "Escolha um caracter para ser repetido: ";
std::cin >> caracter;
std::cout << std::endl;
for(int i = 0;i < 1000; i++){
	std::cout >> caracter;
	sleep(500);
}
return 0;
}
 */