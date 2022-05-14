using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using System.Collections;

namespace CaixaEletronico
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            int num = int.Parse(txtNumero.Text);
            int senha = int.Parse(txtSenha.Text);
            Conexao con = new Conexao();

            try
            {
                ArrayList dados = con.acessoConta(num,senha);
                string nome = dados[1].ToString();
                double saldo = double.Parse(dados[3].ToString());
                Conta conta = new Conta(num, senha, nome, saldo);
                con.fecharConexao();
                conta.Show();
                this.Hide();
            }
            catch (MySqlException ex)
            {
                MessageBox.Show("Problema na conexão com o banco!\n\nUsuario e/ou senha Invalidos!\n\n" + ex.ToString());
            }
        }

        
    }
}
