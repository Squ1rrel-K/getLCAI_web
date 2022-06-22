# This is the entrance of getLCAI

setwd("./")

args=commandArgs()

exp_test_path = args[6] #"./test_data/exp_GSE165843.txt"
pheno_test_path = args[7]#"./test_data/GSE165843_phe.txt"
control_type = args[8]#"shAMPKa"
experimental_type = args[9]#"shCTL"
data_type = args[10]#"Array" 

install.packages("./getLCAI_1.0.1.tar.gz",
                 repos = NULL,
                 type = "source")
library(getLCAI)

exp_test <- read.table(exp_test_path, header = TRUE)
pheno_test <- read.table(pheno_test_path, header = TRUE)

outlist = getlcai(
  exp = exp_test_path,
  pheno = pheno_test_path,
  control = control_type,
  experimental = experimental_type,
  type = data_type,
  plotPCA = TRUE
)

