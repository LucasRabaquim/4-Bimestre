using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace TesteWeb.Models
{
    public class Usuario
    {
        [Display(Name = "Nome do usuário")]
        [Required(ErrorMessage = "O nome é obrigatório")]
        public string NomeUsuario { get; set; }

    

        [Display(Name = "Idade do usuário")]
        [Range(18, 70, ErrorMessage = "Idade permitida entre 18 e 70 anos")]
        public string Idade { get; set; }

        [Display(Name = "CPF do funcionário")]
        [RegularExpression(@"([0-9]{3}\.){3}-[0-9]{2}", ErrorMessage = "CPF inválido!!!")]
        public string cpf { get; set; }

        [Display(Name = "Email Profissional")]
        [RegularExpression(@"\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*", ErrorMessage = "Email inválido")]
        public string Email { get; set; }

        [Display(Name = "Crie seu login")]
        [RegularExpression(@"[a-zA-Z]{5,15}", ErrorMessage = "Somente letras e de 5 a 15 caracteres")]
        public string Login { get; set; }

        [Display(Name = "Crie sua senha")]
        [Required(ErrorMessage = "Senha obrigatório")]
        public string Senha { get; set; }

        [Display(Name = "Confirmar senha")]
        // [Compare("Senha", ErrorMessage = "A senha não corresponde")]
        [Compare("Senha", ErrorMessage = "A senha não corresponde")]
        public string ConfSenha { get; set; }
    }
}