Imports System.Data
Imports System.Data.OleDb

Public Class DataSupir
    Public SQLSTR As String
    Public KONEKSI As New OleDbConnection
    Public CMD As New OleDbCommand
    Public DATblSupir As New OleDbDataAdapter
    Public DTTblSupir As New DataTable
    Public KONEKSISTRING As String
    Public LOKASI As String
    Public XFOTO As String

    Private Sub FORMMAHASISWA_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        LOKASI = System.Environment.CurrentDirectory
        KONEKSISTRING = "Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" & Application.StartupPath & "\UAS_RENTAL_DIMAS D.accdb"
        KONEKSI = New OleDbConnection(KONEKSISTRING)
        KONEKSI.Open()
    End Sub
    Sub KOSONG()
        TXTNO.Text = ""
        TXTJENIS.Text = ""
        TXTTYPE.Text = ""
        TXTTAHUN.Text = ""
        TXTNO.Focus()
    End Sub
    Sub DGV()
        SQLSTR = "SELECT * FROM TblKendaraan"
        DAKENDARAAN = New OleDbDataAdapter(SQLSTR, KONEKSI)
        DTKENDARAAN.Clear()
        DAKENDARAAN.Fill(DTKENDARAAN)
        DGVSUPIR.DataSource = DTKENDARAAN
    End Sub
    Private Sub TXTNO_Leave(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TXTNO.Leave
        On Error Resume Next
        SQLSTR = "SELECT * FROM TblKendaraan WHERE NO='" & TXTNO.Text & "'"
        DAKENDARAAN = New OleDbDataAdapter(SQLSTR, KONEKSI)
        DTTblSupir.Clear()
        DAKENDARAAN.Fill(DTKENDARAAN)
        DGVSUPIR.DataSource = DTKENDARAAN
        If DTKENDARAAN.Rows.Count > 0 Then
            TXTJENIS.Text = DGVSUPIR.Rows(DGVSUPIR.CurrentRow.Index).Cells(1).Value.ToString()
            TXTTYPE.Text = DGVSUPIR.Rows(DGVSUPIR.CurrentRow.Index).Cells(2).Value.ToString()
            TXTTAHUN.Text = DGVSUPIR.Rows(DGVSUPIR.CurrentRow.Index).Cells(3).Value.ToString()
        End If
        DGV()
    End Sub
    Private Sub PBFOTO_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PBFOTO.Click
        OFD.ShowDialog()
        PBFOTO.Image = Image.FromFile(OFD.FileName)
        XFOTO = OFD.FileName
    End Sub
    Sub SIMPAN()
        SQLSTR = "SELECT * FROM TblKendaraan WHERE NO='" & TXTNO.Text & "'"
        DAKENDARAAN = New OleDb.OleDbDataAdapter(SQLSTR, KONEKSI)
        DTKENDARAAN.Clear()
        DAKENDARAAN.Fill(DTKENDARAAN)
        DGVSUPIR.DataSource = DTKENDARAAN
        If DTKENDARAAN.Rows.Count > 0 Then
            SQLSTR = "UPDATE TblKendaraan SET JENIS='" & TXTJENIS.Text & "', TXTTYPE='" & _
            TXTTYPE.Text & "', TXTTAHUN='" & TXTTAHUN.Text & "', WHERE NO='" & TXTNO.Text & "'"
            CMD = New OleDb.OleDbCommand(SQLSTR, KONEKSI)
            CMD.ExecuteNonQuery()
        Else
            SQLSTR = "INSERT INTO TblKendaraan (NO, JENIS, TXTTYPE, TXTTAHUN) VALUES ('" & TXTNO.Text & "','" & TXTJENIS.Text & "','" & TXTTYPE.Text & _
            "','" & TXTTAHUN.Text & "')"
            CMD = New OleDb.OleDbCommand(SQLSTR, KONEKSI)
            CMD.ExecuteNonQuery()
        End If
        KOSONG()
        DGV()
    End Sub
    Sub HAPUS()
        Dim X As DialogResult
        X = MessageBox.Show("DATA TblSupir AKAN DIHAPUS!", "Konfirmasi", MessageBoxButtons.YesNo, MessageBoxIcon.Warning)
        If X = DialogResult.Yes Then
            SQLSTR = "DELETE FROM TBlSupir WHERE NOMORPKK='" & TXTNOMORPKK.Text & "'"
            CMD = New OleDbCommand(SQLSTR, KONEKSI)
            CMD.ExecuteNonQuery()
        End If
        KOSONG()
        DGV()
    End Sub
    Private Sub BTSIMPAN_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles BTSIMPAN.Click
        SIMPAN()
    End Sub

    Private Sub BTHAPUS_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles BTHAPUS.Click
        HAPUS()
    End Sub

    Private Sub BTCLOSE_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles BTCLOSE.Click
        Close()
    End Sub

    Private Sub FORMMAHASISWA_FormClosing(ByVal sender As System.Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles MyBase.FormClosing
        KONEKSI.Close()
    End Sub

    Private Sub OpenFileDialog1_FileOk(ByVal sender As System.Object, ByVal e As System.ComponentModel.CancelEventArgs) Handles OFD.FileOk

    End Sub
End Class