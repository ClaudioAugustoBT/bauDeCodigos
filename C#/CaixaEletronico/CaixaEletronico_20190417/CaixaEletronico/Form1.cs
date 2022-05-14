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
                ArrayList dados = con.buscarDados(num,senha);
                txtSaldo.Text = dados[2].ToString();
                txtTitular.Text = dados[1].ToString();
                //MessageBox.Show("Conta: " + dados[0] + " - Nome do Cliente: " + dados[1] + " - SALDO: " + dados[2]);
                con.fecharConexao();
            }
            catch (MySqlException ex)
            {
                MessageBox.Show("Problema na conexão com o banco!" + ex.ToString());
            }
        }
        
    }
}
