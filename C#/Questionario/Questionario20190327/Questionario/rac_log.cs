using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Questionario
{
    public partial class rac_log : Form
    {
        public rac_log()
        {
            InitializeComponent();
        }

        private void rac_log_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            tRL.SelectedIndex = tRL.SelectedIndex+1;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            tRL.SelectedIndex = tRL.SelectedIndex + 1;
        }
    }
}
