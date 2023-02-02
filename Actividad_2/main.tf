terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~> 4.16"
    }
  }
  required_version = ">= 1.2.0"
}
provider "aws" {
  region = "us-east-1"
}
resource "aws_db_instance" "actividad2-terra" {
  identifier              = "actividad2-terra"
  allocated_storage       = 15
  db_name                 = "DB_terra"
  engine                  = "mysql"
  engine_version          = "5.7"
  instance_class          = "db.t3.micro"
  username                = "admTerra"
  password                = "Viu2022Terra"
  parameter_group_name    = "default.mysql5.7"
  skip_final_snapshot     = true
  backup_retention_period = 15
  backup_window           = "03:00-03:30"
  maintenance_window      = "Sat:05:00-Sat:05:30"
  storage_encrypted       = true
}