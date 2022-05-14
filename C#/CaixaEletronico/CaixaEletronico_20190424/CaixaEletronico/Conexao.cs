using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using System.Collections;

namespace CaixaEletronico
{
    class Conexao
    {

        private string path = "server=localhost;port=3307;User Id=root;password=usbw;database=caixa";
        private MySqlConnection myCon;

        public Conexao()
        {
            myCon = new MySqlConnection(path);
        }

        public void abrirConexao()
        {
            myCon.Open();
        }

        public void fecharConexao()
        {
            myCon.Close();
        }

        public ArrayList acessoConta(int id,int senha)
        {
            ArrayList dados = new ArrayList();
            abrirConexao();

            MySqlCommand comando = new MySqlCommand("select * from dados where id_cliente=? and cd_senha=?", myCon);
            comando.CommandType = System.Data.CommandType.Text;

            comando.Parameters.Clear();
            comando.Parameters.Add("@id_cliente", MySqlDbType.Int32).Value = id;
            comando.Parameters.Add("@cd_senha", MySqlDbType.Int32).Value = senha;
            //receber o conteudo do banco
            MySqlDataReader dr;
            dr = comando.ExecuteReader();
            dr.Read();

            dados.Add(dr.GetInt32(0));
            dados.Add(dr.GetString(1));
            dados.Add(dr.GetInt32(2));
            dados.Add(dr.GetDouble(3));
            dados.Add(dr.GetString(4));
            dados.Add(dr.GetString(5));
            dados.Add(dr.GetInt32(6));
            fecharConexao();
            return dados;      
        }

        public void updateSaldo(double saldo, int id)
        {
            abrirConexao();
            MySqlCommand comando = new MySqlCommand("Update dados set vl_saldo = ? where id_cliente = ?", myCon);
            comando.CommandType = System.Data.CommandType.Text;

            comando.Parameters.Clear();
            comando.Parameters.Add("@vl_saldo", MySqlDbType.Decimal).Value = saldo;
            comando.Parameters.Add("@id_cliente", MySqlDbType.Int32).Value = id;
            comando.ExecuteNonQuery();
        }

    }
}
