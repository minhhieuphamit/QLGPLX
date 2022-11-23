using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace HTQLGPLX
{
    public partial class formThemHSGPLX : Form
    {
        MySqlConnection Conn = new MySqlConnection("Server = quanlygplx.mysql.database.azure.com; Database = qlgplx; UId = phuc; Pwd = @hutech123; Pooling=false;Character Set=utf8");

        public formThemHSGPLX()
        {
            InitializeComponent();
        }

        private void loadComboBoxCCCD()
        {
            try
            {


                Conn.Open();
                String querry = "SELECT SoCCCD FROM LyLich";
                MySqlDataAdapter adap = new MySqlDataAdapter(querry, Conn);
                MySqlCommandBuilder cmd = new MySqlCommandBuilder(adap);
                DataTable dt = new DataTable(); ;
                adap.Fill(dt);
                comboBoxCCCD.DisplayMember = "SoCCCD";
                comboBoxCCCD.DataSource = dt;
                comboBoxCCCD.SelectedIndex = -1;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            finally
            {
                Conn.Close();
            }
        }

        private void loadComboBoxMaHang()
        {
            try
            {
                String querry = "SELECT MaHang FROM HangGPLX";
                Conn.Open();
                MySqlDataAdapter adap = new MySqlDataAdapter(querry, Conn);
                MySqlCommandBuilder cmd = new MySqlCommandBuilder(adap);
                DataTable dt = new DataTable(); ;
                adap.Fill(dt);
                comboBoxMaHang.DisplayMember = "MaHang";
                comboBoxMaHang.DataSource = dt;
                comboBoxMaHang.SelectedIndex = -1;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            finally
            {
                Conn.Close();
            }
        }

        private void loadComboBoxTTSatHach()
        {
            try
            {
                String querry = "SELECT TenTT FROM TrungTamSatHach";
                MySqlDataAdapter adap = new MySqlDataAdapter(querry, Conn);
                MySqlCommandBuilder cmd = new MySqlCommandBuilder(adap);
                DataTable dt = new DataTable(); ;
                adap.Fill(dt);
                comboBoxTTSatHach.DisplayMember = "TenTT";
                comboBoxTTSatHach.DataSource = dt;
                comboBoxTTSatHach.SelectedIndex = -1;
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            finally
            {
                Conn.Close();
            }
        }

        private void formThemThongTin_Load(object sender, EventArgs e)
        {
            loadComboBoxCCCD();
            loadComboBoxMaHang();
            comboBoxCCCD.SelectedIndexChanged += (s, ev) =>
            {
                try
                {
                    String querry = "SELECT CONCAT(HoLot  ,' ', ten) as HoTen FROM LyLich WHERE SoCCCD = '" + comboBoxCCCD.Text + "'";
                    MySqlDataAdapter adap = new MySqlDataAdapter(querry, Conn);
                    MySqlCommandBuilder cmd = new MySqlCommandBuilder(adap);
                    DataTable dt = new DataTable(); ;
                    adap.Fill(dt);
                    labelHoTen.Text = dt.Rows[0][0].ToString();
                }
                catch (Exception ex)
                {
                    MessageBox.Show(ex.Message, "Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
                finally
                {
                    Conn.Close();
                }
            };
            loadComboBoxTTSatHach();
        }

        formHoSoGPLX obj = (formHoSoGPLX)Application.OpenForms["formHoSoGPLX"];
        private void buttonAdd_Click(object sender, EventArgs e)
        {
            try
            {
                if (comboBoxCCCD.Text == "" || comboBoxMaHang.Text == "" || comboBoxTTSatHach.Text == "" || textBoxMaGPLX.Text == "" ||
                    dateTimePickerNgayCap.Text == "" || dateTimePickerNgayHetHan.Text == "" || textBoxDiemLT.Text == "" || textBoxDiemTH.Text == "")
                {
                    MessageBox.Show("Vui lòng nhập đầy đủ thông tin", "Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
                else
                {
                    string querry = "SELECT MaGPLX FROM HoSoGPLX WHERE MaGPLX = '" + textBoxMaGPLX.Text + "'";
                    MySqlDataAdapter adap = new MySqlDataAdapter(querry, Conn);
                    MySqlCommandBuilder cmd = new MySqlCommandBuilder(adap);
                    DataTable dt = new DataTable(); ;
                    adap.Fill(dt);
                    if (dt.Rows.Count > 0)
                    {
                        MessageBox.Show("Số GPLX đã tồn tại!", "Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                    else
                    {
                        Conn.Open();
                        String querry1 = "SELECT MaTT FROM TrungTamSatHach WHERE TenTT LIKE "+comboBoxTTSatHach.Text+"";
                        MySqlDataAdapter adap1 = new MySqlDataAdapter(querry1, Conn);
                        MySqlCommandBuilder cmd1 = new MySqlCommandBuilder(adap1);
                        DataTable dt1 = new DataTable(); ;
                        adap.Fill(dt1);
                        String maTT = dt1.Rows[0][0].ToString();

                        String querry2 = "INSERT INTO HoSoGPLX VALUES('" + textBoxMaGPLX.Text + "','" + comboBoxCCCD.Text + "','" + comboBoxMaHang.Text + "','" + dateTimePickerNgayCap.Value.ToString("yyyy-MM-dd") + "','" + dateTimePickerNgayHetHan.Value.ToString("yyyy-MM-dd") + "','" + maTT + "','" + textBoxDiemLT.Text + "','" + textBoxDiemTH.Text + "')";
                        MySqlCommand cmd2 = new MySqlCommand(querry2,Conn);
                        cmd2.ExecuteNonQuery();
                        MessageBox.Show("Thêm thông tin thành công", "Message", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        obj.loadDataGridView();
                    }
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message, "Message", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            finally
            {
                Conn.Close();
            }
        }

        private void buttonXoaAllThongTin_Click(object sender, EventArgs e)
        {
            DialogResult dialogResult = MessageBox.Show("Thao tác này sẽ xóa câu trả lời của bạn khỏi tất cả câu hỏi. Bạn sẽ không thể hủy được thao tác này sau khi thực hiện.", "Xóa hết câu trả lời trong biểu mẫu?", MessageBoxButtons.YesNo, MessageBoxIcon.Question);
            if (dialogResult == DialogResult.Yes)
            {
                comboBoxCCCD.Text = "";
                labelHoTen.Text = "";
                comboBoxMaHang.Text = "";
                comboBoxTTSatHach.Text = "";
                textBoxMaGPLX.Text = "";
                dateTimePickerNgayCap.Text = "";
                dateTimePickerNgayHetHan.Text = "";
                textBoxDiemLT.Text = "";
                textBoxDiemTH.Text = "";
            }
        }
    }
}
