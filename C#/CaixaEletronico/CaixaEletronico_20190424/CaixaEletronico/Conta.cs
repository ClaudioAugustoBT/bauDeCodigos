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
    public partial class Conta : Form
    {
        int num, senha;      
        public Conta(int num, int senha, string nome, double saldo)
        {
            InitializeComponent();
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.Conta_FormClosing);
            this.num = num;
            this.senha = senha;
            txtTitular.Text = nome;
            txtSaldo.Text = saldo.ToString();
     
        }

        private void btSaque_Click(object sender, EventArgs e)
        {

            try
            {
                Conexao con = new Conexao();
                ArrayList dados = con.acessoConta(num, senha);
                double saldoAT;
                saldoAT = double.Parse(dados[3].ToString()) - 250;
                con.updateSaldo(saldoAT, num);
                txtSaldo.Text = dados[3].ToString();
                con.fecharConexao();
            }
            catch (MySqlException ex)
            {
                MessageBox.Show("Problema na conexão com o banco!\n\n" + ex.ToString());
            }
            
        }


        private void Conta_FormClosing(object sender, FormClosingEventArgs e)
        {
            Form1 form = new Form1();
            form.Show();
        }
    }
}
