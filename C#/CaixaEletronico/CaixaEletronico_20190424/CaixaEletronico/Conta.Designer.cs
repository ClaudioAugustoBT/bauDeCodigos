namespace CaixaEletronico
{
    partial class Conta
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.txtSaldo = new System.Windows.Forms.TextBox();
            this.txtTitular = new System.Windows.Forms.TextBox();
            this.label7 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.btSaque = new System.Windows.Forms.Button();
            this.btDeposito = new System.Windows.Forms.Button();
            this.btTransf = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // txtSaldo
            // 
            this.txtSaldo.Enabled = false;
            this.txtSaldo.Location = new System.Drawing.Point(12, 71);
            this.txtSaldo.Name = "txtSaldo";
            this.txtSaldo.Size = new System.Drawing.Size(100, 20);
            this.txtSaldo.TabIndex = 17;
            // 
            // txtTitular
            // 
            this.txtTitular.Enabled = false;
            this.txtTitular.Location = new System.Drawing.Point(12, 24);
            this.txtTitular.Name = "txtTitular";
            this.txtTitular.Size = new System.Drawing.Size(208, 20);
            this.txtTitular.TabIndex = 16;
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(9, 57);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(43, 13);
            this.label7.TabIndex = 15;
            this.label7.Text = "SALDO";
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(6, 10);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(53, 13);
            this.label5.TabIndex = 14;
            this.label5.Text = "TITULAR";
            // 
            // btSaque
            // 
            this.btSaque.Location = new System.Drawing.Point(9, 151);
            this.btSaque.Name = "btSaque";
            this.btSaque.Size = new System.Drawing.Size(100, 23);
            this.btSaque.TabIndex = 18;
            this.btSaque.Text = "SAQUE";
            this.btSaque.UseVisualStyleBackColor = true;
            this.btSaque.Click += new System.EventHandler(this.btSaque_Click);
            // 
            // btDeposito
            // 
            this.btDeposito.Location = new System.Drawing.Point(9, 180);
            this.btDeposito.Name = "btDeposito";
            this.btDeposito.Size = new System.Drawing.Size(100, 23);
            this.btDeposito.TabIndex = 19;
            this.btDeposito.Text = "DEPOSITO";
            this.btDeposito.UseVisualStyleBackColor = true;
            // 
            // btTransf
            // 
            this.btTransf.Location = new System.Drawing.Point(9, 209);
            this.btTransf.Name = "btTransf";
            this.btTransf.Size = new System.Drawing.Size(103, 23);
            this.btTransf.TabIndex = 20;
            this.btTransf.Text = "TRANSFERENCIA";
            this.btTransf.UseVisualStyleBackColor = true;
            // 
            // Conta
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(232, 262);
            this.Controls.Add(this.btTransf);
            this.Controls.Add(this.btDeposito);
            this.Controls.Add(this.btSaque);
            this.Controls.Add(this.txtSaldo);
            this.Controls.Add(this.txtTitular);
            this.Controls.Add(this.label7);
            this.Controls.Add(this.label5);
            this.Name = "Conta";
            this.Text = "Conta";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox txtSaldo;
        private System.Windows.Forms.TextBox txtTitular;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Button btSaque;
        private System.Windows.Forms.Button btDeposito;
        private System.Windows.Forms.Button btTransf;
    }
}