Imports System.Data
Imports System.Data.OleDb

Public Class MAHASISWA
    Public SQLSTR As String
    Public KONEKSI As New OleDb.OleDbConnection
    Public CMD As New OleDb.OleDbCommand
    Public DAMHS As New OleDb.OleDbDataAdapter
    Public DTMHS As New DataTable
    Public DGVMHS As New DataGridView
    Public KONEKSISTRING As String
    Public LOKASI As String
    Public XFOTO As String
    Public OFD As New OpenFileDialog


    Private Sub MAHASISWA_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        LOKASI = System.Environment.CurrentDirectory
        KONEKSISTRING = "Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" & Application.StartupPath & "\dbNilai.accdb"
        KONEKSI = New OleDb.OleDbConnection(KONEKSISTRING)
        KONEKSI.Open()
    End Sub

    Sub KOSONG()
        tbNpm.Text = ""
        tbNama.Text = ""
        tbKelas.Text = ""
        tbTempat.Text = ""
        'tbTanggal.Text = Now.Date
        tbTanggal.Text = Now.Date.ToString("yyyy-MM-dd") ' Ubah format tanggal sesuai dengan format di database
        pbFoto.Image = Nothing
        tbNpm.Focus()
    End Sub

    Sub DGV()
        SQLSTR = "SELECT * FROM MAHASISWA"
        DAMHS = New OleDb.OleDbDataAdapter(SQLSTR, KONEKSI)
        DTMHS.Clear()
        DAMHS.Fill(DTMHS)
        'DGVMHS.DataSource = DTMHS
        dataGridView.DataSource = DTMHS
    End Sub

    Private Sub MAHASISWA_Activated(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Me.Activated
        DGV()
    End Sub


    Private Sub tbNpm_Leave(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles tbNpm.Leave
        On Error Resume Next
        SQLSTR = "SELECT * FROM MAHASISWA WHERE NPM='" & tbNpm.Text & "'"
        DAMHS = New OleDb.OleDbDataAdapter(SQLSTR, KONEKSI)
        DTMHS.Clear()
        DAMHS.Fill(DTMHS)
        DGVMHS.DataSource = DTMHS
        If DTMHS.Rows.Count > 0 Then
            tbNama.Text = DGVMHS.Rows.Item(DGVMHS.CurrentRow.Index).Cells("NAMA").Value.ToString()
            tbKelas.Text = DGVMHS.Rows.Item(DGVMHS.CurrentRow.Index).Cells("KELAS").Value.ToString()
            tbTempat.Text = DGVMHS.Rows.Item(DGVMHS.CurrentRow.Index).Cells("TEMPLAHIR").Value.ToString()
            tbTanggal.Text = DGVMHS.Rows.Item(DGVMHS.CurrentRow.Index).Cells("TGLLAHIR").Value.ToString("yyyy-MM-dd")
            pbFoto.Image = Image.FromFile(DGVMHS.Rows.Item(DGVMHS.CurrentRow.Index).Cells("FOTO").Value.ToString())
            XFOTO = DGVMHS.Rows.Item(DGVMHS.CurrentRow.Index).Cells("FOTO").Value.ToString()
        End If
        DGV()
    End Sub


    Private Sub pbFoto_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles pbFoto.Click
        OFD.ShowDialog()
        pbFoto.Image = Image.FromFile(OFD.FileName)
        XFOTO = OFD.FileName
    End Sub

    Sub SIMPAN()
        SQLSTR = "SELECT * FROM MAHASISWA WHERE NPM='" & tbNpm.Text & "'"
        DAMHS = New OleDb.OleDbDataAdapter(SQLSTR, KONEKSI)
        DTMHS.Clear()
        DAMHS.Fill(DTMHS)
        DGVMHS.DataSource = DTMHS
        If DTMHS.Rows.Count > 0 Then
            SQLSTR = "UPDATE MAHASISWA SET NAMA='" & tbNama.Text & "', KELAS='" & tbKelas.Text & "', TEMPLAHIR='" & tbTempat.Text & "', TGLLAHIR='" & tbTanggal.Value.ToString("yyyy-MM-dd") & "', FOTO='" & XFOTO & "' WHERE NPM='" & tbNpm.Text & "'"
            CMD = New OleDb.OleDbCommand(SQLSTR, KONEKSI)
            CMD.ExecuteNonQuery()
        Else
            SQLSTR = "INSERT INTO MAHASISWA (NPM, NAMA, KELAS, TEMPLAHIR, TGLLAHIR, FOTO) VALUES ('" & tbNpm.Text & "', '" & tbNama.Text & "', '" & tbKelas.Text & "', '" & tbTempat.Text & "', '" & tbTanggal.Value.ToString("yyyy-MM-dd") & "', '" & XFOTO & "')"
            CMD = New OleDb.OleDbCommand(SQLSTR, KONEKSI)
            CMD.ExecuteNonQuery()
        End If
        KOSONG()
        DGV()
    End Sub

    Sub HAPUS()
        Dim X As String
        X = MsgBox("DATA MAHASISWA AKAN DIHAPUS!", MsgBoxStyle.YesNo)
        If X = vbYes Then
            SQLSTR = "DELETE FROM MAHASISWA WHERE NPM='" & tbNpm.Text & "'"
            CMD = New OleDb.OleDbCommand(SQLSTR, KONEKSI)
            CMD.ExecuteNonQuery()
        End If
        KOSONG()
        DGV()
    End Sub

    Private Sub btSimpan_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btSimpan.Click
        SIMPAN()
    End Sub

    Private Sub btHapus_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btHapus.Click
        HAPUS()
    End Sub

    Private Sub btRefresh_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btRefresh.Click
        KOSONG()
    End Sub

    Private Sub btClose_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btClose.Click
        Close()
    End Sub

    Private Sub MAHASISWA_FormClosing(ByVal sender As System.Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles MyBase.FormClosing
        KONEKSI.Close()
    End Sub

    Sub CARIDATA()
        Dim Nama As String = TXTCARI.Text
        SQLSTR = "SELECT * FROM MAHASISWA WHERE NAMA LIKE '%" & Nama & "%'"
        DAMHS = New OleDb.OleDbDataAdapter(SQLSTR, KONEKSI)
        DTMHS.Clear()
        DAMHS.Fill(DTMHS)
        DGVMHS.DataSource = DTMHS
    End Sub


    Private Sub btCari_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btCari.Click
        CARIDATA()
    End Sub

End Class

