-- Create the 'jobs' table
CREATE TABLE IF NOT EXISTS jobs (
  job_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  salary VARCHAR(50) NOT NULL,
  reports_to VARCHAR(100) NOT NULL,
  essential TEXT NOT NULL,
  preferred TEXT
);

-- Insert sample jobs
INSERT INTO jobs (title, description, salary, reports_to, essential, preferred) VALUES
('Data Analyst', 
'Analyze and interpret data to support business decision-making.', 
'$60,000 - $80,000', 
'Senior Analyst', 
'Bachelor\s in Data Science, Proficiency in Python and SQL, 3+ years experience', 
'Experience with machine learning, Tableau or Power BI'),

('Server Technician', 
'Maintain and troubleshoot server hardware and software systems.', 
'$50,000 - $70,000', 
'IT Manager', 
'Experience with Linux/Windows Server, Virtualization, 2+ years', 
'Knowledge of cloud platforms, basic networking'),

('Web Developer', 
'Design and develop web-based applications and internal tools.', 
'$55,000 - $75,000', 
'Lead Developer', 
'HTML, CSS, JavaScript, PHP, 2+ years experience', 
'React.js, Git, MySQL database skills');
