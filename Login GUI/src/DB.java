import java.io.File;
import java.sql.*;

public class DB {
	private Connection conn = null;
	private Statement stmt = null;
	
	public DB(String dbPath){
		new File(dbPath).delete();
		
		try{
			Class.forName("SQLite.JDBCDriver").newInstance();
			conn = DriverManager.getConnection("jdbc:sqlite:/" + dbPath);
			stmt = conn.createStatement();
		} catch (Exception e){e.printStackTrace(); disconnectDB();}
	}
	
	public Statement getStatement(){return stmt;}
	public void disconnectDB(){
		try{
			if(stmt != null)
				stmt.close();
			if(conn != null)
				conn.close();
		} catch(SQLException e){
			e.printStackTrace();
		}
	}
}
